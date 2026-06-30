<?php

namespace App\Http\Requests\Product;

use App\Domains\Product\Application\DTOs\CreateProductCommand;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'presentation' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'indications' => ['nullable', 'string'],
            'contraindications' => ['nullable', 'string'],
            'ingredients' => ['nullable', 'array'],
            'ingredients.*' => ['string'],

            'purchase_price' => ['nullable', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0'],

            'image_path' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function toCommand(): CreateProductCommand
    {
        return new CreateProductCommand(
            name: $this->string('name')->toString(),
            presentation: $this->input('presentation'),
            description: $this->input('description'),
            indications: $this->input('indications'),
            contraindications: $this->input('contraindications'),
            ingredients: $this->input('ingredients'),

            purchasePrice: $this->input('purchase_price'),
            salePrice: $this->input('sale_price'),

            imagePath: $this->input('image_path'),
        );
    }
}
