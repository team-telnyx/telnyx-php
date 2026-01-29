<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IntegrationSecretShape from \Telnyx\IntegrationSecrets\IntegrationSecret
 *
 * @phpstan-type IntegrationSecretNewResponseShape = array{
 *   data: IntegrationSecret|IntegrationSecretShape
 * }
 */
final class IntegrationSecretNewResponse implements BaseModel
{
    /** @use SdkModel<IntegrationSecretNewResponseShape> */
    use SdkModel;

    #[Required]
    public IntegrationSecret $data;

    /**
     * `new IntegrationSecretNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecretNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationSecretNewResponse)->withData(...)
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
     * @param IntegrationSecret|IntegrationSecretShape $data
     */
    public static function with(IntegrationSecret|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param IntegrationSecret|IntegrationSecretShape $data
     */
    public function withData(IntegrationSecret|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
