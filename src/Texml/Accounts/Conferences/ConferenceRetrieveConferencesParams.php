<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;

/**
 * Lists conference resources.
 *
 * @see Telnyx\STAINLESS_FIXME_Texml\STAINLESS_FIXME_Accounts\ConferencesService::retrieveConferences()
 *
 * @phpstan-type ConferenceRetrieveConferencesParamsShape = array{
 *   DateCreated?: string,
 *   DateUpdated?: string,
 *   FriendlyName?: string,
 *   Page?: int,
 *   PageSize?: int,
 *   PageToken?: string,
 *   Status?: \Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status|value-of<\Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status>,
 * }
 */
final class ConferenceRetrieveConferencesParams implements BaseModel
{
    /** @use SdkModel<ConferenceRetrieveConferencesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    #[Api(optional: true)]
    public ?string $DateCreated;

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    #[Api(optional: true)]
    public ?string $DateUpdated;

    /**
     * Filters conferences by their friendly name.
     */
    #[Api(optional: true)]
    public ?string $FriendlyName;

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    #[Api(optional: true)]
    public ?int $Page;

    /**
     * The number of records to be displayed on a page.
     */
    #[Api(optional: true)]
    public ?int $PageSize;

    /**
     * Used to request the next page of results.
     */
    #[Api(optional: true)]
    public ?string $PageToken;

    /**
     * Filters conferences by status.
     *
     * @var value-of<Status>|null $Status
     */
    #[Api(
        enum: Status::class,
        optional: true,
    )]
    public ?string $Status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $Status
     */
    public static function with(
        ?string $DateCreated = null,
        ?string $DateUpdated = null,
        ?string $FriendlyName = null,
        ?int $Page = null,
        ?int $PageSize = null,
        ?string $PageToken = null,
        Status|string|null $Status = null,
    ): self {
        $obj = new self;

        null !== $DateCreated && $obj->DateCreated = $DateCreated;
        null !== $DateUpdated && $obj->DateUpdated = $DateUpdated;
        null !== $FriendlyName && $obj->FriendlyName = $FriendlyName;
        null !== $Page && $obj->Page = $Page;
        null !== $PageSize && $obj->PageSize = $PageSize;
        null !== $PageToken && $obj->PageToken = $PageToken;
        null !== $Status && $obj['Status'] = $Status;

        return $obj;
    }

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj->DateCreated = $dateCreated;

        return $obj;
    }

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj->DateUpdated = $dateUpdated;

        return $obj;
    }

    /**
     * Filters conferences by their friendly name.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj->FriendlyName = $friendlyName;

        return $obj;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->Page = $page;

        return $obj;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->PageSize = $pageSize;

        return $obj;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $obj = clone $this;
        $obj->PageToken = $pageToken;

        return $obj;
    }

    /**
     * Filters conferences by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status,
    ): self {
        $obj = clone $this;
        $obj['Status'] = $status;

        return $obj;
    }
}
