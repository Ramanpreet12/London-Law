<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'user_id',
        'proposed_name_1',
        'proposed_name_2',
        'is_llp',
        'contact_ref',
        'article_id',
        'company_style_id',
        'registration_location_id',
        'property_postcode',
        'property_address_1',
        'property_address_2',
        'property_town',
        'property_county_region',
        'object_id',
        'is_custom_object',
        'custom_object_text',
        'sic_code_1_id',
        'sic_code_2_id',
        'sic_code_3_id',
        'sic_code_4_id',
        'bespoke_mem_arts',
        'supporting_docs_supplied',
        'supporting_docs_path',
        'currency',
        'nominal_value',
        'total_shares',
        'shares_a',
        'shares_b',
        'max_amount_a',
        'max_amount_b',
        'current_step',
    ];
}
