<?php

    use GDText\Box;
    use GDText\Color;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Storage;
    use Intervention\Image\Facades\Image;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::post('/generate', function (\Illuminate\Http\Request $request){

        $img = Image::make(Storage::disk('local')->get('white.png'));
        if (!$request->filled('brainlet')) {
            $brainlets = collect(Storage::disk('local')->allFiles('faces'));
            $img->insert(Storage::get($brainlets->random()), 'bottom-left');
        }
        else if(Storage::disk('local')->exists($request->get('brainlet'))) {

            $img->insert(Storage::get($request->get('brainlet')), 'bottom-left');
        }
        $img->insert(Storage::disk('local')->get('base.png') );



        $im = $img->getCore();

        $box = new Box($im);
        $box->setFontFace(storage_path("app").'/font.ttf'); // http://www.dafont.com/minecraftia.font
        $box->setFontColor(new Color(0, 0, 0));
        $box->setLineHeight(1.2);
        $box->setBox(130+128,50, 350, 320);
        $box->setTextAlign('center', 'center');

        $box->drawFitFontSize($request->get('comment'), 1, 64, 10);

        $box->setFontSize(16);

        $img->setCore($im);
        $box->setBox(200+128,433, 290, 55);
        $box->setTextAlign('left', 'center');
        $box->setFontSize(32);
        $box->draw("- ".$request->get('name'));


        return $img->response('png');
    })->name('generate');

Route::view('/', 'welcome', [
    'brainlets' => Storage::disk('local')->allFiles('faces')
]);
