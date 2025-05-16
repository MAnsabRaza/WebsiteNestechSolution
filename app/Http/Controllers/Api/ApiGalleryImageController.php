<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\inward;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiGalleryImageController extends Controller
{
    public function fetchSearchGalleryImage()
    {
        $gallery = inward::fetchSearchGalleryImage();
        return DataTables::of($gallery)->make(true);
    }

    public function getMaxGalleryId()
    {
        $id = GalleryImage::max('id') + 1;
        return response()->json(['id' => $id]);
    }

    public function saveGalleryImage(Request $request)
    {
        if ($request->voucher_type == 'edit' && $request->has('id')) {
            $galleryImage = GalleryImage::find($request->id);
            if ($galleryImage) {
                $this->inputGalleryImageField($galleryImage, $request);
                $galleryImage->save();
                return response()->json(['success' => true, 'message' => 'Gallery image updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Gallery image not found'], 404);
            }
        } else {
            $galleryImage = new GalleryImage();
            $this->inputGalleryImageField($galleryImage, $request);
            $galleryImage->save();
            return response()->json(['success' => true, 'message' => 'Gallery image saved successfully']);
        }
    }

    private function inputGalleryImageField($galleryImage, Request $request)
    {
        $galleryImage->voucher_type = $request->voucher_type;
        $galleryImage->current_date = $request->current_date;
        $galleryImage->gallery_description = $request->gallery_description;
        $galleryImage->status = $request->status ?? 0;

        if ($request->hasFile('gallery_image')) {
            $file = $request->file('gallery_image');
            $imageType = $file->getClientOriginalExtension();
            $imageData = 'data:image/' . $imageType . ';base64,' . base64_encode(file_get_contents($file));
            $galleryImage->gallery_image = $imageData;
        }
    }

    public function getAllGalleryImages()
    {
        $galleryImages = GalleryImage::where('status', 1)->get();

        $result = $galleryImages->map(function ($image) {
            $imageData = $image->toArray();

            // The gallery_image already contains the complete data URL
            if ($image->gallery_image) {
                $imageData['base64_image'] = $image->gallery_image;
            }

            return $imageData;
        });

        return response()->json([
            'success' => true,
            'data' => $result,
            'message' => 'Gallery images retrieved successfully'
        ]);
    }

    public function deleteGalleryImage($id)
    {
        $galleryImage = GalleryImage::find($id);
        if ($galleryImage) {
            $galleryImage->delete();
            return response()->json(['success' => true, 'message' => 'Gallery image deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gallery image not found'], 404);
        }
    }

    public function updateGalleryImageStatus(Request $request, $id)
    {
        $galleryImage = GalleryImage::find($id);
        if ($galleryImage) {
            $galleryImage->status = $request->status;
            $galleryImage->save();
            return response()->json(['success' => true, 'message' => 'Gallery image status updated successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Gallery image not found']);
    }

    public function fetchGalleryImage($id)
    {
        $galleryImage = GalleryImage::find($id);

        if ($galleryImage && $galleryImage->gallery_image) {
            $galleryImage->base64_image = $galleryImage->gallery_image;
        }

        return response()->json(['success' => true, 'data' => $galleryImage]);
    }
}