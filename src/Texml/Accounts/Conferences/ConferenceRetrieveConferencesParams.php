<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ConferenceRetrieveConferencesParams); // set properties as needed
 * $client->texml.accounts.conferences->retrieveConferences(...$params->toArray());
 * ```
 * Lists conference resources.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.conferences->retrieveConferences(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Conferences->retrieveConferences
 *
 * @phpstan-type conference_retrieve_conferences_params = array{
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
    /** @use SdkModel<conference_retrieve_conferences_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    #[Api(optional: true)]
    public ?string $dateCreated;

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    #[Api(optional: true)]
    public ?string $dateUpdated;

    /**
     * Filters conferences by their friendly name.
     */
    #[Api(optional: true)]
    public ?string $friendlyName;

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    #[Api(optional: true)]
    public ?int $page;

    /**
     * The number of records to be displayed on a page.
     */
    #[Api(optional: true)]
    public ?int $pageSize;

    /**
     * Used to request the next page of results.
     */
    #[Api(optional: true)]
    public ?string $pageToken;

    /**
     * Filters conferences by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
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

        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $friendlyName && $obj->friendlyName = $friendlyName;
        null !== $page && $obj->page = $page;
        null !== $pageSize && $obj->pageSize = $pageSize;
        null !== $pageToken && $obj->pageToken = $pageToken;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj->dateCreated = $dateCreated;

        return $obj;
    }

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj->dateUpdated = $dateUpdated;

        return $obj;
    }

    /**
     * Filters conferences by their friendly name.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj->friendlyName = $friendlyName;

        return $obj;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $obj = clone $this;
        $obj->pageToken = $pageToken;

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
