<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns multiple recording transcription resources for an account.
 *
 * @see Telnyx\Services\Texml\AccountsService::retrieveTranscriptionsJson()
 *
 * @phpstan-type AccountRetrieveTranscriptionsJsonParamsShape = array{
 *   pageSize?: int, pageToken?: string
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
    #[Optional]
    public ?int $pageSize;

    /**
     * Used to request the next page of results.
     */
    #[Optional]
    public ?string $pageToken;

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
        ?int $pageSize = null,
        ?string $pageToken = null
    ): self {
        $obj = new self;

        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $pageToken && $obj['pageToken'] = $pageToken;

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
}
