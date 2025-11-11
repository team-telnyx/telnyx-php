<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a paginated list of assistant tests with optional filtering capabilities.
 *
 * @see Telnyx\AI\Assistants\Tests->list
 *
 * @phpstan-type TestListParamsShape = array{
 *   destination?: string,
 *   page?: Page,
 *   telnyx_conversation_channel?: string,
 *   test_suite?: string,
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
    #[Api(optional: true)]
    public ?string $destination;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    #[Api(optional: true)]
    public ?string $telnyx_conversation_channel;

    /**
     * Filter tests by test suite name.
     */
    #[Api(optional: true)]
    public ?string $test_suite;

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
        ?string $destination = null,
        ?Page $page = null,
        ?string $telnyx_conversation_channel = null,
        ?string $test_suite = null,
    ): self {
        $obj = new self;

        null !== $destination && $obj->destination = $destination;
        null !== $page && $obj->page = $page;
        null !== $telnyx_conversation_channel && $obj->telnyx_conversation_channel = $telnyx_conversation_channel;
        null !== $test_suite && $obj->test_suite = $test_suite;

        return $obj;
    }

    /**
     * Filter tests by destination (phone number, webhook URL, etc.).
     */
    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    public function withTelnyxConversationChannel(
        string $telnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj->telnyx_conversation_channel = $telnyxConversationChannel;

        return $obj;
    }

    /**
     * Filter tests by test suite name.
     */
    public function withTestSuite(string $testSuite): self
    {
        $obj = clone $this;
        $obj->test_suite = $testSuite;

        return $obj;
    }
}
