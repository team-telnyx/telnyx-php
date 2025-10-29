<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ExternalConnectionListResponseShape = array{
 *   data?: list<ExternalConnection>,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta,
 * }
 */
final class ExternalConnectionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ExternalConnectionListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<ExternalConnection>|null $data */
    #[Api(list: ExternalConnection::class, optional: true)]
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
     * @param list<ExternalConnection> $data
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
     * @param list<ExternalConnection> $data
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
