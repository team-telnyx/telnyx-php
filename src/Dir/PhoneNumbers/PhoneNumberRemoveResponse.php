<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse\Meta;

/**
 * Bulk-delete partial-success response. `data` is the list of phone numbers that were soft-deleted. `meta.errors` holds per-number failures (e.g. number not associated with this DIR). When EVERY number in the request fails, the endpoint instead returns 400 with the canonical Telnyx error envelope and `data`/`meta` are absent.
 *
 * @phpstan-import-type MetaShape from \Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse\Meta
 *
 * @phpstan-type PhoneNumberRemoveResponseShape = array{
 *   data: list<string>, meta: Meta|MetaShape
 * }
 */
final class PhoneNumberRemoveResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberRemoveResponseShape> */
    use SdkModel;

    /**
     * Phone numbers that were successfully soft-deleted. Bare E.164 strings.
     *
     * @var list<string> $data
     */
    #[Required(list: 'string')]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new PhoneNumberRemoveResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberRemoveResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberRemoveResponse)->withData(...)->withMeta(...)
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
     * @param list<string> $data
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * Phone numbers that were successfully soft-deleted. Bare E.164 strings.
     *
     * @param list<string> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
