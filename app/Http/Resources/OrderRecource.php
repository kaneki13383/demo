<?php

namespace App\Http\Resources;

use App\Models\ProductOrders;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderRecource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'order_price' => $this->order_price,
            'products' => ProductsOrderResource::collection(ProductOrders::where('id_order', $this->id)->get())
        ];
    }
}
