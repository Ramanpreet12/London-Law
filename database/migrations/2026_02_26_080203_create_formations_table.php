<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Step 1
            $table->string('proposed_name_1')->unique();
            $table->string('proposed_name_2')->nullable();
            $table->boolean('is_llp')->default(false);
            // Step 2
            $table->string('contact_ref')->nullable()->unique();
            $table->foreignId('article_id')->nullable()->constrained();
            $table->foreignId('company_style_id')->nullable()->constrained();
            $table->foreignId('registration_location_id')->nullable()->constrained();
            // RTM Property Address
            $table->string('property_postcode')->nullable();
            $table->string('property_address_1')->nullable();
            $table->string('property_address_2')->nullable();
            $table->string('property_town')->nullable();
            $table->string('property_county_region')->nullable();

            // Object Section
            $table->foreignId('object_id')->nullable()->constrained('company_objects');
            $table->boolean('is_custom_object')->default(false);
            $table->text('custom_object_text')->nullable();
            // SIC Codes
            $table->foreignId('sic_code_1_id')->nullable()->constrained('sic_codes');
            $table->foreignId('sic_code_2_id')->nullable()->constrained('sic_codes');
            $table->foreignId('sic_code_3_id')->nullable()->constrained('sic_codes');
            $table->foreignId('sic_code_4_id')->nullable()->constrained('sic_codes');
            // Toggles & Shares
            $table->boolean('bespoke_mem_arts')->default(false);
            $table->boolean('supporting_docs_supplied')->default(false);
            $table->string('supporting_docs_path')->nullable(); // For file upload

            $table->foreignId('currency')->nullable()->constrained();
            $table->decimal('nominal_value', 15, 6)->nullable();
            $table->integer('total_shares')->nullable();
            $table->integer('shares_a')->nullable();
            $table->integer('shares_b')->nullable();
            $table->integer('max_amount_a')->nullable();
            $table->integer('max_amount_b')->nullable();
            $table->integer('current_step')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
