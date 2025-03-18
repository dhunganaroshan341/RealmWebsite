<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['portfolio_data', 'is_active'];

    // Automatically decode JSON data for easy access
    public function getPortfolioDataAttribute($value)
    {
        return json_decode($value, true); // Decode JSON to array
    }

    // Accessor for specific attributes
    public function getServiceIdAttribute()
    {
        return $this->portfolio_data['service']['service_id'] ?? null;
    }

    public function getCustomServiceNameAttribute()
    {
        return $this->portfolio_data['service']['custom_service_name'] ?? null;
    }

    public function getClientNameAttribute()
    {
        return $this->portfolio_data['client']['client_name'] ?? null;
    }

    public function getCustomClientNameAttribute()
    {
        return $this->portfolio_data['custom_client_name'] ?? null;
    }

    public function getContentUrlAttribute()
    {
        return $this->portfolio_data['content']['url'] ?? null;
    }

    public function getCustomFlagAttribute()
    {
        return $this->portfolio_data['custom_flag'] ?? false;
    }
}
