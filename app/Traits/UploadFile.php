<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

trait UploadFile
{
    /**
     * upload Image
     *
     * @param file $originalFile
     * @param string $rootFolder
     * @param array $listSize
     * @param bool $imagePosition
     * @return mixed
     */
    public function processUploadImage($originalFile, $rootFolder, $listSize = array(), $imagePosition = false)
    {
        ini_set('memory_limit','256M');
        // check config
        $fileSystem = config("filesystems.default");
        switch ($fileSystem) {
            case 's3':
                $result = $this->uploadImageToAWS3($originalFile, $rootFolder, $listSize, $imagePosition);
                if ($result['msgCode'] === 400) {
                    foreach($result['image'] as $key => $image) {
                        $this->deleteImageUpload($image);
                    }
                }
                return $result;
                break;
            default:
                // check folder
                $this->createDirectoryFolderInPublic($rootFolder, $listSize);

                // upload image
                $result = $this->uploadImageToPublic($originalFile, $rootFolder, $listSize, $imagePosition);

                // check and remove
                if ($result['msgCode'] === 400) {
                    foreach($result['image'] as $key => $image) {
                        $this->deleteImageUpload($image);
                    }
                }
                return $result;
                break;
        }
    }

    /**
     * upload Image
     *
     * @param object $originalFile
     * @param $rootFolder
     * @param $listSize
     * @param $imagePosition
     * @return array
     */
    public function uploadImageToAWS3($originalFile, $rootFolder, $listSize, $imagePosition)
    {
        $imageName = \microtime(true). '.jpg';
        // upload image
        $result = array();
        if (count($listSize) > 0) {
            $continueUpload = true;
            // upload image follow step type: original, thumb or icon
            foreach($listSize as $key => $size) {
                if ($continueUpload) {
                    if (!$imagePosition) {
                        $img = Image::canvas($size['width'], $size['height']);
                        $image = Image::make($originalFile)
                            ->resize($size['width'], $size['height'], function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            });
                        $img->insert($image, 'center');
                    } else {
                        $img = Image::make($originalFile)
                            ->resize($size['width'], $size['height']);
                    }
                    $pathUpload = "$rootFolder/$key/$imageName";
                    $resultPath = Storage::disk('s3')->put($pathUpload, $img->stream());
                    if ( $resultPath != "") {
                        $result['msgCode'] = 200;
                        $result['image'][$key] = env('AWS_URL') . $pathUpload;
                    } else {
                        $result['msgCode'] = 400;
                        $continueUpload = false;
                    }
                }
            }
        } else {
            $img = Image::make($originalFile);
            $pathUpload = "$rootFolder/$imageName";
            $resultPath = Storage::disk('s3')->put($pathUpload, $img->stream());
            if ( $resultPath != "") {
                $result['msgCode'] = 200;
                $result['msg'] = "success";
                $result['image']['original'] = env('AWS_URL') . $pathUpload;
            } else {
                $result['msgCode'] = 400;
                $result['msg'] = "failed";
            }
        }

        return $result;
    }

    /**
     * upload Image
     *
     * @param object $originalFile
     * @param $rootFolder
     * @param $listSize
     * @param $imagePosition
     * @return array
     */
    public function uploadImageToPublic($originalFile, $rootFolder, $listSize, $imagePosition)
    {
        $imageName = \microtime(true). '.jpg';
        // upload image
        $result = array();
        if (count($listSize) > 0) {
            $continueUpload = true;
            foreach($listSize as $key => $size) {
                if ($continueUpload) {
                    $img = Image::make($originalFile)
                        ->resize($size['width'], $size['height']);
                    $pathUpload = public_path()."/$rootFolder/$key/$imageName";
                    if ($img->save($pathUpload)) {
                        $result['msgCode'] = 200;
                        $result['image'][$key] = "/$rootFolder/$key/$imageName";
                    } else {
                        $result['msgCode'] = 400;
                        $continueUpload = false;
                    }
                }
            }
        } else {
            $img = Image::make($originalFile);
            $pathUpload = public_path()."/$rootFolder/$imageName";
            if ($img->save($pathUpload)) {
                $result['msgCode'] = 200;
                $result['image']['original'] = "/$rootFolder/$imageName";
            } else {
                $result['msgCode'] = 400;
            }
        }

        return $result;
    }

    /**
     * delete image from folder
     *
     * @param object $originalFile
     * @param string $imageName
     */
    public function deleteImageUpload($imagePath)
    {
        $fileDrive = config("filesystems.default");

        if ($fileDrive == 's3') {
            if (Storage::disk('s3')->has($imagePath)) {
                Storage::disk('s3')->delete($imagePath);
            }
        }
        else {
            $imagePath = public_path().$imagePath;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
    }

    /**
     * create directory folder image
     *
     * @return mixed
     */
    public function createDirectoryFolderInPublic($rootFolder, $listSize)
    {
        $uploadPath = public_path()."/$rootFolder";
        if(!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, $mode = 0777, true, true);
        }

        if (count($listSize) > 0) {
            foreach ($listSize as $key => $value) {
                $uploadPath = public_path()."/$rootFolder/$key";
                if(!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, $mode = 0777, true, true);
                }
            }
        }
    }
}
