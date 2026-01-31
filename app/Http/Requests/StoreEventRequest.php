<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenant_key' => ['required', 'string', 'max:64'],
            'device_uid' => ['required', 'string', 'max:64'],
            'event_uid'  => ['required', 'string', 'max:64'],
            'type'       => ['required', 'string', 'max:64'],
            'occurred_at' => ['required', 'date'],
            'payload'    => ['required', 'array'],
        ];
    }

    public function messages(): array
    {
        return [
            'tenant_key.required'  => 'Tenant key is required.',
            'tenant_key.string'    => 'Tenant key must be a string.',
            'tenant_key.max'       => 'Tenant key may not exceed 64 characters.',

            'device_uid.required'  => 'Device UID is required.',
            'device_uid.string'    => 'Device UID must be a string.',
            'device_uid.max'       => 'Device UID may not exceed 64 characters.',

            'event_uid.required'   => 'Event UID is required.',
            'event_uid.string'     => 'Event UID must be a string.',
            'event_uid.max'        => 'Event UID may not exceed 64 characters.',

            'type.required'        => 'Event type is required.',
            'type.string'          => 'Event type must be a string.',
            'type.max'             => 'Event type may not exceed 64 characters.',

            'occurred_at.required' => 'Occurred at timestamp is required.',
            'occurred_at.date'     => 'Occurred at must be a valid ISO 8601 date.',

            'payload.required'     => 'Payload data is required.',
            'payload.array'        => 'Payload must be a valid JSON object.',
            // not sure about lat and lng range. so not validation further. 
        ];
    }
}
