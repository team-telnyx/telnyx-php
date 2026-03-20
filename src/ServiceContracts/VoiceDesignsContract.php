<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceDesigns\VoiceDesignCreateParams\Provider;
use Telnyx\VoiceDesigns\VoiceDesignGetResponse;
use Telnyx\VoiceDesigns\VoiceDesignListParams\Sort;
use Telnyx\VoiceDesigns\VoiceDesignListResponse;
use Telnyx\VoiceDesigns\VoiceDesignNewResponse;
use Telnyx\VoiceDesigns\VoiceDesignRenameResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceDesignsContract
{
    /**
     * @api
     *
     * @param string $prompt Natural language description of the voice style, e.g. 'Speak in a warm, friendly tone with a slight British accent'.
     * @param string $text sample text to synthesize for this voice design
     * @param string $language Language for synthesis. Supported values: Auto, Chinese, English, Japanese, Korean, German, French, Russian, Portuguese, Spanish, Italian. Defaults to Auto.
     * @param int $maxNewTokens Maximum number of tokens to generate. Default: 2048.
     * @param string $name Name for the voice design. Required when creating a new design (`voice_design_id` is not provided); ignored when adding a version. Cannot be a UUID.
     * @param Provider|value-of<Provider> $provider Voice synthesis provider. `telnyx` uses the Qwen3TTS model; `minimax` uses the Minimax speech models. Case-insensitive. Defaults to `telnyx`.
     * @param float $repetitionPenalty Repetition penalty to reduce repeated patterns in generated audio. Default: 1.05.
     * @param float $temperature Sampling temperature controlling randomness. Higher values produce more varied output. Default: 0.9.
     * @param int $topK Top-k sampling parameter — limits the token vocabulary considered at each step. Default: 50.
     * @param float $topP Top-p (nucleus) sampling parameter — cumulative probability cutoff for token selection. Default: 1.0.
     * @param string $voiceDesignID ID of an existing voice design to add a new version to. When provided, a new version is created instead of a new design.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $prompt,
        string $text,
        string $language = 'Auto',
        ?int $maxNewTokens = null,
        ?string $name = null,
        Provider|string $provider = 'telnyx',
        ?float $repetitionPenalty = null,
        ?float $temperature = null,
        ?int $topK = null,
        ?float $topP = null,
        ?string $voiceDesignID = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceDesignNewResponse;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param int $version Specific version number to retrieve. Defaults to the latest version.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?int $version = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceDesignGetResponse;

    /**
     * @api
     *
     * @param string $filterName case-insensitive substring filter on the name field
     * @param int $pageNumber page number for pagination (1-based)
     * @param int $pageSize number of results per page
     * @param Sort|value-of<Sort> $sort Sort order. Prefix with `-` for descending. Defaults to `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VoiceDesignListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $version the version number to delete
     * @param string $id the voice design UUID or name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $version,
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param int $version Specific version number to download the sample for. Defaults to the latest version.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        ?int $version = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $id the voice design UUID or name
     * @param string $name new name for the voice design
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rename(
        string $id,
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): VoiceDesignRenameResponse;
}
