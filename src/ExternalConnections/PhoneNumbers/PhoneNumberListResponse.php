<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalVoiceIntegrationsPaginationMeta;

/**
 * @phpstan-type phone_number_list_response = array{
 *   data?: list<ExternalConnectionPhoneNumber>,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta,
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class PhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<phone_number_list_response> */
    use SdkModel;

    /** @var list<ExternalConnectionPhoneNumber>|null $data */
    #[Api(list: ExternalConnectionPhoneNumber::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?ExternalVoiceIntegrationsPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ExternalConnectionPhoneNumber> $data
     */
    public static function with(
        ?array $data = null,
        ?ExternalVoiceIntegrationsPaginationMeta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<ExternalConnectionPhoneNumber> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(
        ExternalVoiceIntegrationsPaginationMeta $meta
    ): self {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
