<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IntegrationShape from \Telnyx\AI\Integrations\Integration
 *
 * @phpstan-type IntegrationListResponseShape = array{
 *   data: list<Integration|IntegrationShape>
 * }
 */
final class IntegrationListResponse implements BaseModel
{
    /** @use SdkModel<IntegrationListResponseShape> */
    use SdkModel;

    /** @var list<Integration> $data */
    #[Required(list: Integration::class)]
    public array $data;

    /**
     * `new IntegrationListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationListResponse)->withData(...)
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
     * @param list<Integration|IntegrationShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Integration|IntegrationShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
