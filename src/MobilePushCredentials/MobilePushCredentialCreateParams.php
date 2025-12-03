<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\Android;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\Ios;

/**
 * Creates a new mobile push credential.
 *
 * @see Telnyx\Services\MobilePushCredentialsService::create()
 *
 * @phpstan-type MobilePushCredentialCreateParamsShape = array{
 *   createMobilePushCredentialRequest: Ios|Android
 * }
 */
final class MobilePushCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<MobilePushCredentialCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(union: CreateMobilePushCredentialRequest::class)]
    public Ios|Android $createMobilePushCredentialRequest;

    /**
     * `new MobilePushCredentialCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MobilePushCredentialCreateParams::with(createMobilePushCredentialRequest: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MobilePushCredentialCreateParams)
     *   ->withCreateMobilePushCredentialRequest(...)
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
    public static function with(
        Ios|Android $createMobilePushCredentialRequest
    ): self {
        $obj = new self;

        $obj->createMobilePushCredentialRequest = $createMobilePushCredentialRequest;

        return $obj;
    }

    public function withCreateMobilePushCredentialRequest(
        Ios|Android $createMobilePushCredentialRequest
    ): self {
        $obj = clone $this;
        $obj->createMobilePushCredentialRequest = $createMobilePushCredentialRequest;

        return $obj;
    }
}
