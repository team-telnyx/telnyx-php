<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\Provider;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\ServiceType;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpeechToTextContract
{
    /**
     * @api
     *
     * @param Provider|value-of<Provider> $provider Filter to entries for a specific STT provider. The enum mirrors the providers advertised across the speech-to-text spec (including `google` and `telnyx`, which are accepted as WebSocket transcription engines). A provider that has no models currently registered for any service type will return an empty `data` array rather than an error.
     * @param ServiceType|value-of<ServiceType> $serviceType filter to entries that support the given service type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listProviders(
        Provider|string|null $provider = null,
        ServiceType|string|null $serviceType = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpeechToTextListProvidersResponse;
}
