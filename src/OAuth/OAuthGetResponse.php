<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthGetResponse\Data;
use Telnyx\OAuth\OAuthGetResponse\Data\RequestedScope;

/**
 * @phpstan-type OAuthGetResponseShape = array{data?: Data|null}
 */
final class OAuthGetResponse implements BaseModel
{
    /** @use SdkModel<OAuthGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   client_id?: string|null,
     *   logo_uri?: string|null,
     *   name?: string|null,
     *   policy_uri?: string|null,
     *   redirect_uri?: string|null,
     *   requested_scopes?: list<RequestedScope>|null,
     *   tos_uri?: string|null,
     *   verified?: bool|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   client_id?: string|null,
     *   logo_uri?: string|null,
     *   name?: string|null,
     *   policy_uri?: string|null,
     *   redirect_uri?: string|null,
     *   requested_scopes?: list<RequestedScope>|null,
     *   tos_uri?: string|null,
     *   verified?: bool|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
