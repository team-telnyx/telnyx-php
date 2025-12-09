<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestListParams\Page;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a paginated list of assistant tests with optional filtering capabilities.
 *
 * @see Telnyx\Services\AI\Assistants\TestsService::list()
 *
 * @phpstan-type TestListParamsShape = array{
 *   destination?: string,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   telnyxConversationChannel?: string,
 *   testSuite?: string,
 * }
 */
final class TestListParams implements BaseModel
{
    /** @use SdkModel<TestListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter tests by destination (phone number, webhook URL, etc.).
     */
    #[Optional]
    public ?string $destination;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    #[Optional]
    public ?string $telnyxConversationChannel;

    /**
     * Filter tests by test suite name.
     */
    #[Optional]
    public ?string $testSuite;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        ?string $destination = null,
        Page|array|null $page = null,
        ?string $telnyxConversationChannel = null,
        ?string $testSuite = null,
    ): self {
        $obj = new self;

        null !== $destination && $obj['destination'] = $destination;
        null !== $page && $obj['page'] = $page;
        null !== $telnyxConversationChannel && $obj['telnyxConversationChannel'] = $telnyxConversationChannel;
        null !== $testSuite && $obj['testSuite'] = $testSuite;

        return $obj;
    }

    /**
     * Filter tests by destination (phone number, webhook URL, etc.).
     */
    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj['destination'] = $destination;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    public function withTelnyxConversationChannel(
        string $telnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj['telnyxConversationChannel'] = $telnyxConversationChannel;

        return $obj;
    }

    /**
     * Filter tests by test suite name.
     */
    public function withTestSuite(string $testSuite): self
    {
        $obj = clone $this;
        $obj['testSuite'] = $testSuite;

        return $obj;
    }
}
