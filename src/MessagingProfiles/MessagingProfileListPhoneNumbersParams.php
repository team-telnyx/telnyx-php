<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersParams\Page;

/**
 * List phone numbers associated with a messaging profile.
 *
 * @see Telnyx\Services\MessagingProfilesService::listPhoneNumbers()
 *
 * @phpstan-import-type PageShape from \Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersParams\Page
 *
 * @phpstan-type MessagingProfileListPhoneNumbersParamsShape = array{
 *   page?: PageShape|null
 * }
 */
final class MessagingProfileListPhoneNumbersParams implements BaseModel
{
    /** @use SdkModel<MessagingProfileListPhoneNumbersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PageShape $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
