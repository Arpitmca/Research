<?php


namespace  App\Helpers;

use App\Models\Upload;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 *  
 */
class Uploader
{
    /*
        This function does not do any validation it will just move whatever it is presented.
        This function will create a corresponding upload Object and return it.
        This function will create folder inside storage folderand move the file inside it.
        This function should be used for non-sensitive documents and they will be publically applicable.
     */
    public function storeByFTP(UploadedFile $uploadedFile, $destination_folder_name, $destination_file_name)
    {
        if(config('app.env') == "local") {
            $path = $uploadedFile->storeAs(
               config('app.env') . "/" . $destination_folder_name, $destination_file_name, ['disk' => 'ftp']
            );
        } else {
            $path = $uploadedFile->storePubliclyAs(
               config('app.env') . "/" . $destination_folder_name, $destination_file_name, ['disk' => 'ftp']
            );
        }
        if (!$path) {
            throw \Exception("Wasn't able to store the image.");
            return;
        }

        $newUpload = new Upload;
        $newUpload->disk = "ftp";
        $newUpload->category = $destination_folder_name;
        $newUpload->path = $path;
        $newUpload->name = $destination_file_name;
        $newUpload->save();
        return $newUpload;
    }  
    public function storeUrlByFTP($file_url,$destination_folder_name, $destination_file_name)
    {
        $client = new Client([]);
        if (!file_exists(public_path("/temp/"))) {
            mkdir(public_path("/temp/"));
        }
        $temp_file_path = public_path("/temp/" .$destination_file_name) ;
        $response = $client->get($file_url,  ['sink' => $temp_file_path ]);
        if (!file_exists(public_path("/temp/" .$destination_file_name))) {
            throw new \Exception("Cannot pull the file from the URL");
            return;
        }
        $uploadedFile = new UploadedFile($temp_file_path,$destination_file_name);
        $uploadObject =  $this->storeByFTP($uploadedFile, $destination_folder_name, $destination_file_name);
        if (file_exists($temp_file_path)) {
            unlink($temp_file_path);
        }
        return $uploadObject;
    }  

}