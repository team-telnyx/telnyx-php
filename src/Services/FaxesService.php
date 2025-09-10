<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Faxes\FaxCreateParams;
use Telnyx\Faxes\FaxCreateParams\PreviewFormat;
use Telnyx\Faxes\FaxCreateParams\Quality;
use Telnyx\Faxes\FaxGetResponse;
use Telnyx\Faxes\FaxListParams;
use Telnyx\Faxes\FaxListParams\Filter;
use Telnyx\Faxes\FaxListParams\Page;
use Telnyx\Faxes\FaxListResponse;
use Telnyx\Faxes\FaxNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxesContract;
use Telnyx\Services\Faxes\ActionsService;

use const Telnyx\Core\OMIT as omit;

final class FaxesService implements FaxesContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($this->client);
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
     */
    public function create(
        $connectionID,
        $from,
        $to,
        $clientState = omit,
        $fromDisplayName = omit,
        $mediaName = omit,
        $mediaURL = omit,
        $monochrome = omit,
        $previewFormat = omit,
        $quality = omit,
        $storeMedia = omit,
        $storePreview = omit,
        $t38Enabled = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): FaxNewResponse {
        [$parsed, $options] = FaxCreateParams::parseRequest(
            [
                'connectionID' => $connectionID,
                'from' => $from,
                'to' => $to,
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
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'faxes',
            body: (object) $parsed,
            options: $options,
            convert: FaxNewResponse::class,
        );
    }

    /**
     * @api
     *
     * View a fax
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['faxes/%1$s', $id],
            options: $requestOptions,
            convert: FaxGetResponse::class,
        );
    }

    /**
     * @api
     *
     * View a list of faxes
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): FaxListResponse {
        [$parsed, $options] = FaxListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'faxes',
            query: $parsed,
            options: $options,
            convert: FaxListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a fax
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['faxes/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
