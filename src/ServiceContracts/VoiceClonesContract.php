<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\TelnyxDesignClone;
use Telnyx\VoiceClones\VoiceCloneData;
use Telnyx\VoiceClones\VoiceCloneListParams\FilterProvider;
use Telnyx\VoiceClones\VoiceCloneListParams\Sort;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse;
use Telnyx\VoiceClones\VoiceCloneNewResponse;
use Telnyx\VoiceClones\VoiceCloneUpdateParams\Gender;
use Telnyx\VoiceClones\VoiceCloneUpdateResponse;

/**
 * @phpstan-import-type ParamsShape from \Telnyx\VoiceClones\VoiceCloneCreateParams\Params
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceClonesContract
{
    /**
     * @api
     *
     * @param ParamsShape $params request body for creating a voice clone from an existing voice design
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        TelnyxDesignClone|array|MinimaxDesignClone $params,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneNewResponse;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param string $name new name for the voice clone
     * @param Gender|value-of<Gender> $gender updated gender for the voice clone
     * @param string $language updated ISO 639-1 language code or `auto`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $name,
        Gender|string|null $gender = null,
        ?string $language = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneUpdateResponse;

    /**
     * @api
     *
     * @param string $filterName case-insensitive substring filter on the name field
     * @param FilterProvider|value-of<FilterProvider> $filterProvider Filter by voice synthesis provider. Case-insensitive.
     * @param int $pageNumber page number for pagination (1-based)
     * @param int $pageSize number of results per page
     * @param Sort|value-of<Sort> $sort Sort order. Prefix with `-` for descending. Defaults to `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VoiceCloneData>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        FilterProvider|string|null $filterProvider = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createFromUpload(
        mixed $uploadParams,
        RequestOptions|array|null $requestOptions = null
    ): VoiceCloneNewFromUploadResponse;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string;
}
