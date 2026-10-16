<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\HostedSignups\HostedSignupCreateParams\SignupType;
use Telnyx\Whatsapp\HostedSignups\HostedSignupGetResponse;
use Telnyx\Whatsapp\HostedSignups\HostedSignupListResponse;
use Telnyx\Whatsapp\HostedSignups\HostedSignupNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface HostedSignupsContract
{
    /**
     * @api
     *
     * @param string $appID Meta App ID linked to the Telnyx account. The app must be enabled.
     * @param \DateTimeInterface $expiresAt When the onboarding URL expires, in RFC 3339 format. Must be in the future and at most 3 days ahead. Defaults to 24 hours after creation.
     * @param SignupType|value-of<SignupType> $signupType Onboarding flow the hosted page launches. Use `coexistence` for a number that remains active in the WhatsApp Business app.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $appID,
        ?\DateTimeInterface $expiresAt = null,
        SignupType|string $signupType = 'standard',
        RequestOptions|array|null $requestOptions = null,
    ): HostedSignupNewResponse;

    /**
     * @api
     *
     * @param string $id Hosted signup ID returned when the hosted signup was created
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): HostedSignupGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<HostedSignupListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
