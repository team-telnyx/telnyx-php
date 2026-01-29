<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AutoRespConfigShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig
 *
 * @phpstan-type AutoRespConfigResponseShape = array{
 *   data: AutoRespConfig|AutoRespConfigShape
 * }
 */
final class AutoRespConfigResponse implements BaseModel
{
    /** @use SdkModel<AutoRespConfigResponseShape> */
    use SdkModel;

    #[Required]
    public AutoRespConfig $data;

    /**
     * `new AutoRespConfigResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutoRespConfigResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutoRespConfigResponse)->withData(...)
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
     * @param AutoRespConfig|AutoRespConfigShape $data
     */
    public static function with(AutoRespConfig|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param AutoRespConfig|AutoRespConfigShape $data
     */
    public function withData(AutoRespConfig|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
