<?php

declare(strict_types=1);

namespace Telnyx\BotSessions\BotSessionListResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{apiV2Token: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * API v2 session token for the signed-in user. Use it as a bearer token on authenticated endpoints.
     */
    #[Required('api_v2_token')]
    public string $apiV2Token;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(apiV2Token: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withAPIV2Token(...)
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
     */
    public static function with(string $apiV2Token): self
    {
        $self = new self;

        $self['apiV2Token'] = $apiV2Token;

        return $self;
    }

    /**
     * API v2 session token for the signed-in user. Use it as a bearer token on authenticated endpoints.
     */
    public function withAPIV2Token(string $apiV2Token): self
    {
        $self = clone $this;
        $self['apiV2Token'] = $apiV2Token;

        return $self;
    }
}
