<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type JobShape from \Telnyx\PhoneNumberBlocks\Jobs\Job
 *
 * @phpstan-type JobGetResponseShape = array{data?: null|Job|JobShape}
 */
final class JobGetResponse implements BaseModel
{
    /** @use SdkModel<JobGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Job $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Job|JobShape|null $data
     */
    public static function with(Job|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Job|JobShape $data
     */
    public function withData(Job|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
