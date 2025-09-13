<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalVoiceIntegrationsPaginationMeta;

/**
 * @phpstan-type upload_list_response = array{
 *   data?: list<Upload>, meta?: ExternalVoiceIntegrationsPaginationMeta
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class UploadListResponse implements BaseModel
{
    /** @use SdkModel<upload_list_response> */
    use SdkModel;

    /** @var list<Upload>|null $data */
    #[Api(list: Upload::class, optional: true)]
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
     * @param list<Upload> $data
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
     * @param list<Upload> $data
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
