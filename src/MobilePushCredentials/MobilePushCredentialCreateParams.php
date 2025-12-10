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
 * @phpstan-type MobilePushCredentialCreateParamsShape = array{
 *   createMobilePushCredentialRequest: CreateIosPushCredentialRequest|array{
 *     alias: string, certificate: string, privateKey: string, type?: 'ios'
 *   }|CreateAndroidPushCredentialRequest|array{
 *     alias: string, projectAccountJsonFile: array<string,mixed>, type?: 'android'
 *   },
 * }
 */
final class MobilePushCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<MobilePushCredentialCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * @param CreateIosPushCredentialRequest|array{
     *   alias: string, certificate: string, privateKey: string, type?: 'ios'
     * }|CreateAndroidPushCredentialRequest|array{
     *   alias: string, projectAccountJsonFile: array<string,mixed>, type?: 'android'
     * } $createMobilePushCredentialRequest
     */
    public static function with(
        CreateIosPushCredentialRequest|array|CreateAndroidPushCredentialRequest $createMobilePushCredentialRequest,
    ): self {
        $self = new self;

        $self['createMobilePushCredentialRequest'] = $createMobilePushCredentialRequest;

        return $self;
    }

    /**
     * @param CreateIosPushCredentialRequest|array{
     *   alias: string, certificate: string, privateKey: string, type?: 'ios'
     * }|CreateAndroidPushCredentialRequest|array{
     *   alias: string, projectAccountJsonFile: array<string,mixed>, type?: 'android'
     * } $createMobilePushCredentialRequest
     */
    public function withCreateMobilePushCredentialRequest(
        CreateIosPushCredentialRequest|array|CreateAndroidPushCredentialRequest $createMobilePushCredentialRequest,
    ): self {
        $self = clone $this;
        $self['createMobilePushCredentialRequest'] = $createMobilePushCredentialRequest;

        return $self;
    }
}
