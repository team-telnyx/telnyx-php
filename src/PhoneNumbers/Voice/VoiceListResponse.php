<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;

/**
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<PhoneNumberWithVoiceSettings>, meta?: PaginationMeta
 * }
 */
final class VoiceListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VoiceListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PhoneNumberWithVoiceSettings>|null $data */
    #[Api(list: PhoneNumberWithVoiceSettings::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumberWithVoiceSettings> $data
     */
    public static function with(
        ?array $data = null,
        ?PaginationMeta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<PhoneNumberWithVoiceSettings> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
