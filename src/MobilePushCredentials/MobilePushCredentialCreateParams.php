<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateAndroidPushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateIosPushCredentialRequest;

/**
 * Creates a new mobile push credential.
 *
 * @see Telnyx\Services\MobilePushCredentialsService::create()
 *
 * @phpstan-import-type CreateMobilePushCredentialRequestVariants from \Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest
 * @phpstan-import-type CreateMobilePushCredentialRequestShape from \Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest
 *
 * @phpstan-type MobilePushCredentialCreateParamsShape = array{
 *   createMobilePushCredentialRequest: CreateMobilePushCredentialRequestShape
 * }
 */
final class MobilePushCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<MobilePushCredentialCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * @var CreateMobilePushCredentialRequestVariants $createMobilePushCredentialRequest
     */
    #[Required(union: CreateMobilePushCredentialRequest::class)]
    public CreateIosPushCredentialRequest|CreateAndroidPushCredentialRequest $createMobilePushCredentialRequest;

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
     *
     * @param CreateMobilePushCredentialRequestShape $createMobilePushCredentialRequest
     */
    public static function with(
        CreateIosPushCredentialRequest|array|CreateAndroidPushCredentialRequest $createMobilePushCredentialRequest,
    ): self {
        $self = new self;

        $self['createMobilePushCredentialRequest'] = $createMobilePushCredentialRequest;

        return $self;
    }

    /**
     * @param CreateMobilePushCredentialRequestShape $createMobilePushCredentialRequest
     */
    public function withCreateMobilePushCredentialRequest(
        CreateIosPushCredentialRequest|array|CreateAndroidPushCredentialRequest $createMobilePushCredentialRequest,
    ): self {
        $self = clone $this;
        $self['createMobilePushCredentialRequest'] = $createMobilePushCredentialRequest;

        return $self;
    }
}
