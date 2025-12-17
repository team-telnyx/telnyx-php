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
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   friendlyName?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   pageToken?: string|null,
 *   status?: null|Status|value-of<Status>,
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
     * @param Status|value-of<Status>|null $status
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
        $self = new self;

        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $friendlyName && $self['friendlyName'] = $friendlyName;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageToken && $self['pageToken'] = $pageToken;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

        return $self;
    }

    /**
     * Filters conferences by their friendly name.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $self = clone $this;
        $self['friendlyName'] = $friendlyName;

        return $self;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $self = clone $this;
        $self['pageToken'] = $pageToken;

        return $self;
    }

    /**
     * Filters conferences by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
