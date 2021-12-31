<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeBrainletRequest;
use App\Models\Brainlet;
use GDText\Box;

use GDText\Color;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrainletController extends Controller
{
    public function create(MakeBrainletRequest $request) {

        #to remove 4byte characters like emojis etc..
        function replace_4byte($string) {
            return preg_replace('%(?:
          \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
        | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
    )%xs', '', $string);
        }

        $brain = Brainlet::create([
            'name' => $request->get('name'),
            'comment' => replace_4byte($request->get('comment')),
            'brainlet' => $request->get('brainlet')]);

        return redirect()->route('brainlet.get', ['id' => $brain->id]);

    }

    public function get(int $id) {
        $brain = Brainlet::whereId($id)->firstOrFail();


        $img = Image::make(Storage::disk('local')->get('white.png'));
        if ($brain->brainlet) {
            $img->insert($brain->brainlet, 'bottom-left');
        }
        $img->insert(Storage::disk('local')->get('base.png'));

        $im = $img->getCore();

        $box = new Box($im);
        $box->setFontFace(storage_path("app").'/font.ttf');
        $box->setFontColor(new Color(0, 0, 0));
        $box->setLineHeight(1.2);
        $box->setBox(130+128,50, 350, 320);
        $box->setTextAlign('center', 'center');
        $box->drawFitFontSize($brain->comment, 1, 64, 10);

        $box->setFontSize(16);
        $img->setCore($im);
        $box->setBox(200+128,433, 290, 55);
        $box->setTextAlign('left', 'center');
        $box->setFontSize(32);
        $box->draw("- ".$brain->name);

        return $img->response('png');
    }
}
