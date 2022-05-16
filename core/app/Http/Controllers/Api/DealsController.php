<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Support\Facades\Validator;
use Exception;
class DealsController extends Controller
{

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function index()
        {
            $deals = Deal::all();
    
            return sendResponse(DealResource::collection($deals), 'Deals retrieved successfully.');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'title'       => 'required|min:10',
                'description' => 'required|min:40'
            ]);
    
            if ($validator->fails()) return sendError('Validation Error.', $validator->errors(), 422);
    
            try {
                $deal = Deal::create([
                    'title'       => $request->title,
                    'description' => $request->description,
                    'subcategories_id' => $request->subcategories_id,
                    'user_id' => auth()->user()->id
                ]);
                $success = new DealResource($deal);
                $message = 'Yay! A deal has been successfully created.';
            } catch (Exception $e) {
                $success = [];
                $message = $e->getMessage();
            }
    
            return sendResponse($success, $message);
        }
    
        /**
         * Display the specified resource.
         *
         * @param $id
         * @return \Illuminate\Http\JsonResponse
         */
        public function show($id)
        {
            $deal = Deal::find($id);
    
            if (is_null($deal)) return sendError('Deal not found.');
    
            return sendResponse(new DealResource($deal), 'Deal retrieved successfully.');
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param Post    $post
         * @return \Illuminate\Http\JsonResponse
         */
        public function update(Request $request, Deal $deal)
        {
            $validator = Validator::make($request->all(), [
                'title'       => 'required|min:10',
                'description' => 'required|min:40'
            ]);
    
            if ($validator->fails()) return sendError('Validation Error.', $validator->errors(), 422);
    
            try {
                $deal->title       = $request->title;
                $deal->description = $request->description;
                $deal->save();
    
                $success = new DealResource($deal);
                $message = 'Yay! Deal has been successfully updated.';
            } catch (Exception $e) {
                $success = [];
                $message = $e->getMessage();
            }
    
            return sendResponse($success, $message);
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param Post $post
         * @return \Illuminate\Http\JsonResponse
         */
        public function destroy(Deal $deal)
        {
            try {
                $deal->delete();
                return sendResponse([], 'The deal has been successfully deleted.');
            } catch (Exception $e) {
                return sendError($e->getMessage());
            }
        }
    }
