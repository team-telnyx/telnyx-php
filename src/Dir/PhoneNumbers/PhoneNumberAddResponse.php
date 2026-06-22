<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Bulk-add success response (HTTP 201). All numbers in the request were accepted into a single new batch. Every entry in `data` shares the same `batch_id` - read it from any element to obtain the batch id for subsequent `GET .../phone_number_batches/{batch_id}` calls. If any number in the request fails (schema-invalid, not in inventory, already attached to another DIR, etc.) the entire request is rejected with HTTP 400 and the canonical Telnyx error envelope; the success body described here is therefore an all-or-nothing payload.
 *
 * @phpstan-import-type DirPhoneNumberShape from \Telnyx\Dir\PhoneNumbers\DirPhoneNumber
 *
 * @phpstan-type PhoneNumberAddResponseShape = array{
 *   data: list<DirPhoneNumber|DirPhoneNumberShape>
 * }
 */
final class PhoneNumberAddResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAddResponseShape> */
    use SdkModel;

    /**
     * Phone numbers accepted into the new batch. List order mirrors the request order. Each element shares the same `batch_id`.
     *
     * @var list<DirPhoneNumber> $data
     */
    #[Required(list: DirPhoneNumber::class)]
    public array $data;

    /**
     * `new PhoneNumberAddResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAddResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAddResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DirPhoneNumber|DirPhoneNumberShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Phone numbers accepted into the new batch. List order mirrors the request order. Each element shares the same `batch_id`.
     *
     * @param list<DirPhoneNumber|DirPhoneNumberShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
