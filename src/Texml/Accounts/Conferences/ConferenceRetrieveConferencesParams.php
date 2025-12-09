<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;

/**
 * Lists conference resources.
 *
 * @see Telnyx\Services\Texml\Accounts\ConferencesService::retrieveConferences()
 *
 * @phpstan-type ConferenceRetrieveConferencesParamsShape = array{
 *   dateCreated?: string,
 *   dateUpdated?: string,
 *   friendlyName?: string,
 *   page?: int,
 *   pageSize?: int,
 *   pageToken?: string,
 *   status?: Status|value-of<Status>,
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
    #[Optional]
    public ?string $dateCreated;

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    #[Optional]
    public ?string $dateUpdated;

    /**
     * Filters conferences by their friendly name.
     */
    #[Optional]
    public ?string $friendlyName;

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    #[Optional]
    public ?int $page;

    /**
     * The number of records to be displayed on a page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Used to request the next page of results.
     */
    #[Optional]
    public ?string $pageToken;

    /**
     * Filters conferences by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?string $friendlyName = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $dateCreated && $obj['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $obj['dateUpdated'] = $dateUpdated;
        null !== $friendlyName && $obj['friendlyName'] = $friendlyName;
        null !== $page && $obj['page'] = $page;
        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $pageToken && $obj['pageToken'] = $pageToken;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj['dateCreated'] = $dateCreated;

        return $obj;
    }

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj['dateUpdated'] = $dateUpdated;

        return $obj;
    }

    /**
     * Filters conferences by their friendly name.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj['friendlyName'] = $friendlyName;

        return $obj;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $obj = clone $this;
        $obj['pageToken'] = $pageToken;

        return $obj;
    }

    /**
     * Filters conferences by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
