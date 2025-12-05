<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns multiple recording transcription resources for an account.
 *
 * @see Telnyx\Services\Texml\AccountsService::retrieveTranscriptionsJson()
 *
 * @phpstan-type AccountRetrieveTranscriptionsJsonParamsShape = array{
 *   PageSize?: int, PageToken?: string
 * }
 */
final class AccountRetrieveTranscriptionsJsonParams implements BaseModel
{
    /** @use SdkModel<AccountRetrieveTranscriptionsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?int $PageSize = null,
        ?string $PageToken = null
    ): self {
        $obj = new self;

        null !== $PageSize && $obj['PageSize'] = $PageSize;
        null !== $PageToken && $obj['PageToken'] = $PageToken;

        return $obj;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['PageSize'] = $pageSize;

        return $obj;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $obj = clone $this;
        $obj['PageToken'] = $pageToken;

        return $obj;
    }
}
