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
     * @param ServiceType|value-of<ServiceType> $serviceType Filter to entries that support the given service type. For backward compatibility with the values that briefly shipped before the product-aligned rename, the legacy aliases `file_transcription`, `in_call_transcription`, and `ai_assistant_transcription` are silently accepted and normalized to `file_based`, `in_call`, and `ai_assistant` respectively. The response always emits the canonical (post-rename) values.
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
