<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Faxes\Fax;
use Telnyx\Faxes\FaxCreateParams\PreviewFormat;
use Telnyx\Faxes\FaxCreateParams\Quality;
use Telnyx\Faxes\FaxGetResponse;
use Telnyx\Faxes\FaxListParams\Filter;
use Telnyx\Faxes\FaxNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxesContract;
use Telnyx\Services\Faxes\ActionsService;

/**
 * Programmable fax command operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Faxes\FaxListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FaxesService implements FaxesContract
{
    /**
     * @api
     */
    public FaxesRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FaxesRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Send a fax. Files have size limits and page count limit validations. If a file is bigger than 50MB or has more than 350 pages it will fail with `file_size_limit_exceeded` and `page_count_limit_exceeded` respectively.
     *
     * **Expected Webhooks:**
     *
     * - `fax.queued`
     * - `fax.media.processed`
     * - `fax.sending.started`
     * - `fax.delivered`
     * - `fax.failed`
     *
     * @param string $connectionID the connection ID to send the fax with
     * @param string $from The phone number, in E.164 format, the fax will be sent from.
     * @param string $to The phone number, in E.164 format, the fax will be sent to or SIP URI
     * @param int $blackThreshold The black threshold percentage for monochrome faxes. Only applicable if `monochrome` is set to `true`.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $fromDisplayName The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     * @param string $mediaName The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     * @param string $mediaURL The URL (or list of URLs) to the PDF used for the fax's media. media_url and media_name/contents can't be submitted together.
     * @param bool $monochrome the flag to enable monochrome, true black and white fax results
     * @param PreviewFormat|value-of<PreviewFormat> $previewFormat the format for the preview file in case the `store_preview` is `true`
     * @param Quality|value-of<Quality> $quality The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
     * @param bool $storeMedia Should fax media be stored on temporary URL. It does not support media_name, they can't be submitted together.
     * @param bool $storePreview should fax preview be stored on temporary URL
     * @param bool $t38Enabled The flag to disable the T.38 protocol.
     * @param string $webhookURL use this field to override the URL to which Telnyx will send subsequent webhooks for this fax
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        string $from,
        string $to,
        int $blackThreshold = 95,
        ?string $clientState = null,
        ?string $fromDisplayName = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        bool $monochrome = false,
        PreviewFormat|string $previewFormat = 'tiff',
        Quality|string $quality = 'high',
        bool $storeMedia = false,
        bool $storePreview = false,
        bool $t38Enabled = true,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): FaxNewResponse {
        $params = Util::removeNulls(
            [
                'connectionID' => $connectionID,
                'from' => $from,
                'to' => $to,
                'blackThreshold' => $blackThreshold,
                'clientState' => $clientState,
                'fromDisplayName' => $fromDisplayName,
                'mediaName' => $mediaName,
                'mediaURL' => $mediaURL,
                'monochrome' => $monochrome,
                'previewFormat' => $previewFormat,
                'quality' => $quality,
                'storeMedia' => $storeMedia,
                'storePreview' => $storePreview,
                't38Enabled' => $t38Enabled,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a fax
     *
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FaxGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of faxes
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Fax>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a fax
     *
     * @param string $id the unique identifier of a fax
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
}
