<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns multiple recording resources for an account.
 *
 * @see Telnyx\Services\Texml\AccountsService::retrieveRecordingsJson()
 *
 * @phpstan-type AccountRetrieveRecordingsJsonParamsShape = array{
 *   dateCreated?: \DateTimeInterface|null, page?: int|null, pageSize?: int|null
 * }
 */
final class AccountRetrieveRecordingsJsonParams implements BaseModel
{
    /** @use SdkModel<AccountRetrieveRecordingsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filters recording by the creation date. Expected format is ISO8601 date or date-time, ie. {YYYY}-{MM}-{DD} or {YYYY}-{MM}-{DD}T{hh}:{mm}:{ss}Z. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    #[Optional]
    public ?\DateTimeInterface $dateCreated;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?\DateTimeInterface $dateCreated = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filters recording by the creation date. Expected format is ISO8601 date or date-time, ie. {YYYY}-{MM}-{DD} or {YYYY}-{MM}-{DD}T{hh}:{mm}:{ss}Z. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    public function withDateCreated(\DateTimeInterface $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

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
}
