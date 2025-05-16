<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostAdController extends Controller
{
    public function savePost(Request $request)
    {
        $userId = Auth::id();
        if ($request->voucher_type == 'edit' && $request->has('id')) {
            $post = Post::find($request->id);
            if ($post) {
                $this->inputPostField($post, $request, $userId);
                $post->save();
                $this->handleMultipleImages($post, $request);

                return response()->json(['success' => true, 'message' => 'Post updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Post not found'], 404);
            }
        } else {
            $post = new Post();
            $this->inputPostField($post, $request, $userId);
            $post->save();

            // Handle multiple images for new post
            $this->handleMultipleImages($post, $request);

            return response()->json(['success' => true, 'message' => 'Post saved successfully']);
        }
    }
    private function inputPostField($post, Request $request, $userId)
    {
        $post->current_date = $request->current_date;
        $post->voucher_type = $request->voucher_type;
        $post->status = $request->status ?? 0;
        $post->postAd_manage_by = $request->postAd_manage_by;
        $post->postAd_for = $request->postAd_for;
        $post->postAd_owner_name = $request->postAd_owner_name;
        $post->postAd_contact_number = $request->postAd_contact_number;
        $post->category_id = $request->category_id;
        $post->user_id = $userId;
        $post->postAd_type = $request->postAd_type;
        $post->postAd_residential_type = $request->postAd_residential_type;
        $post->postAd_commercial_type = $request->postAd_commercial_type;
        $post->postAd_storey = $request->postAd_storey;
        $post->postAd_direction = $request->postAd_direction;
        $post->postAd_building_structure = $request->postAd_building_structure;
        $post->postAd_city = $request->postAd_city;
        $post->postAd_price = $request->postAd_price;
        $post->postAd_address = $request->postAd_address;
        $post->advance_payment = $request->advance_payment ?? '';
        $post->postAd_description = $request->postAd_description;
        $post->saleStatus = $request->saleStatus ?? '';
        $post->postAd_society = $request->postAd_society ?? '';
    }

    private function handleMultipleImages($post, Request $request)
    {
        // For the main single image preview (optional field)
        if ($request->hasFile('postAd_images') && is_array($request->file('postAd_images')) === false) {
            $file = $request->file('postAd_images');
            $imageType = $file->getClientOriginalExtension();
            $imageData = 'data:image/' . $imageType . ';base64,' . base64_encode(file_get_contents($file));
            $post->postAd_images = $imageData;
            $post->save();
        }
        if ($request->hasFile('postAd_images') && is_array($request->file('postAd_images'))) {
            $files = $request->file('postAd_images');
            $maxImages = 10;

            if ($request->voucher_type == 'edit' && $request->has('delete_images')) {
                $deleteImages = explode(',', $request->delete_images);
                PostImage::whereIn('id', $deleteImages)->delete();
            }

            $remainingSlots = $maxImages - $post->images()->count();
            $filesToProcess = array_slice($files, 0, $remainingSlots);

            foreach ($filesToProcess as $file) {
                $imageType = $file->getClientOriginalExtension();
                $imageData = 'data:image/' . $imageType . ';base64,' . base64_encode(file_get_contents($file));

                $post->images()->create([
                    'image_path' => $imageData // Save base64 directly
                ]);
            }
        }
    }
}
