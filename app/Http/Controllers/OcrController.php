<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleCloudVision\GoogleCloudVision;
use GoogleCloudVision\Request\AnnotateImageRequest;

class OcrController extends Controller{

    public function ocrImage(Request $request){
       // dd($request);
        if($request->file('image')[$request->myarray]){
        	//convert image to base64
            $image = base64_encode(file_get_contents($request->file('image')[$request->myarray]));
            //Sending image for OCR server
            $request = new AnnotateImageRequest();
            $request->setImage($image);
            $request->setFeature("TEXT_DETECTION");
            $gcvRequest = new GoogleCloudVision([$request],  env('GOOGLE_CLOUD_KEY'));
            //Send Request to check image OCR or not through annotate
            $response = $gcvRequest->annotate();
            $number = $response->responses[0]->textAnnotations[0]->description;
            return preg_replace('/\D/', '', $number);
          //echo json_encode(["description" => is_int($response->responses[0]->textAnnotations[0]->description]);
        }
    }
}

//https://datatables.net/examples/api/show_hide.html