<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VoiceDesignsContract;
use Telnyx\VoiceDesigns\VoiceDesignGetResponse;
use Telnyx\VoiceDesigns\VoiceDesignListParams\Sort;
use Telnyx\VoiceDesigns\VoiceDesignListResponse;
use Telnyx\VoiceDesigns\VoiceDesignNewResponse;
use Telnyx\VoiceDesigns\VoiceDesignRenameResponse;

/**
 * Create and manage AI-generated voice designs using natural language prompts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceDesignsService implements VoiceDesignsContract
{
    /**
     * @api
     */
    public VoiceDesignsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoiceDesignsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new voice design (version 1) when `voice_design_id` is omitted. When `voice_design_id` is provided, adds a new version to the existing design instead. A design can have at most 50 versions.
     *
     * @param string $prompt Natural language description of the voice style, e.g. 'Speak in a warm, friendly tone with a slight British accent'.
     * @param string $text sample text to synthesize for this voice design
     * @param string $language Language for synthesis. Supported values: Auto, Chinese, English, Japanese, Korean, German, French, Russian, Portuguese, Spanish, Italian. Defaults to Auto.
     * @param int $maxNewTokens Maximum number of tokens to generate. Default: 2048.
     * @param string $name Name for the voice design. Required when creating a new design (`voice_design_id` is not provided); ignored when adding a version. Cannot be a UUID.
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
        ?float $repetitionPenalty = null,
        ?float $temperature = null,
        ?int $topK = null,
        ?float $topP = null,
        ?string $voiceDesignID = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceDesignNewResponse {
        $params = Util::removeNulls(
            [
                'prompt' => $prompt,
                'text' => $text,
                'language' => $language,
                'maxNewTokens' => $maxNewTokens,
                'name' => $name,
                'repetitionPenalty' => $repetitionPenalty,
                'temperature' => $temperature,
                'topK' => $topK,
                'topP' => $topP,
                'voiceDesignID' => $voiceDesignID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the latest version of a voice design, or a specific version when `?version=N` is provided. The `id` parameter accepts either a UUID or the design name.
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
    ): VoiceDesignGetResponse {
        $params = Util::removeNulls(['version' => $version]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of voice designs belonging to the authenticated account.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterName' => $filterName,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a voice design and all of its versions. This action cannot be undone.
     *
     * @param string $id the voice design UUID or name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a specific version of a voice design. The version number must be a positive integer.
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
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteVersion($version, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Downloads the WAV audio sample for the voice design. Returns the latest version's sample by default, or a specific version when `?version=N` is provided. The `id` parameter accepts either a UUID or the design name.
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
    ): string {
        $params = Util::removeNulls(['version' => $version]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->downloadSample($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the name of a voice design. All versions retain their other properties.
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
    ): VoiceDesignRenameResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rename($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
