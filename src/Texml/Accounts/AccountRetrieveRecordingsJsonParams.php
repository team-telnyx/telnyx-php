<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns multiple recording resources for an account.
 *
 * @see Telnyx\Texml\Accounts->retrieveRecordingsJson
 *
 * @phpstan-type AccountRetrieveRecordingsJsonParamsShape = array{
 *   dateCreated?: \DateTimeInterface, page?: int, pageSize?: int
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $dateCreated;

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
        $obj = new self;

        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $page && $obj->page = $page;
        null !== $pageSize && $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Filters recording by the creation date. Expected format is ISO8601 date or date-time, ie. {YYYY}-{MM}-{DD} or {YYYY}-{MM}-{DD}T{hh}:{mm}:{ss}Z. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    public function withDateCreated(\DateTimeInterface $dateCreated): self
    {
        $obj = clone $this;
        $obj->dateCreated = $dateCreated;

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
}
