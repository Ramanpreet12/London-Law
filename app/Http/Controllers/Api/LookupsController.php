<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CompanyObject;
use App\Models\CompanyStyle;
use App\Models\Currency;
use App\Models\RegistrationLocation;
use App\Models\SicCode;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class LookupsController extends Controller
{
    use ApiResponse;

    public function getArticles()
    {
        try {
            $articles = Article::get();
            return $this->successResponse($articles, 'Articles get successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to get Articles ' . $e->getMessage(), 500);
        }
    }

    public function getStyles()
    {
        try {
            $styles = CompanyStyle::get();
            return $this->successResponse($styles, 'Company Styles retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to get Styles ' . $e->getMessage(), 500);
        }
    }

    public function getLocations()
    {
        try {
            $locations = RegistrationLocation::get();
            return $this->successResponse($locations, 'Registration Locations retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to get Locations: ' . $e->getMessage(), 500);
        }
    }

    public function getObjects()
    {
        try {
            $objects = CompanyObject::get();
            return $this->successResponse($objects, 'Company Objects retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to get Objects: ' . $e->getMessage(), 500);
        }
    }

    public function getSicCodes()
    {
        try {
            $sicCodes = SicCode::get();
            return $this->successResponse($sicCodes, 'SIC Codes retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to get SIC Codes: ' . $e->getMessage(), 500);
        }
    }
    public function getCurrency()
    {
        try {
            $currency = Currency::get();
            return $this->successResponse($currency, 'Currency retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to get Currency: ' . $e->getMessage(), 500);
        }
    }
}
