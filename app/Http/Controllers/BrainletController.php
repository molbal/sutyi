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

        $brain = Brainlet::create([
            'name' => $request->get('name'),
            'comment' => $request->get('comment'),
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
        $box->setFontFace(storage_path("app").'/font.ttf'); // http://www.dafont.com/minecraftia.font
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
