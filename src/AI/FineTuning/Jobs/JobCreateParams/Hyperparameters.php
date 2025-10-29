<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs\JobCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The hyperparameters used for the fine-tuning job.
 *
 * @phpstan-type HyperparametersShape = array{nEpochs?: int}
 */
final class Hyperparameters implements BaseModel
{
    /** @use SdkModel<HyperparametersShape> */
    use SdkModel;

    /**
     * The number of epochs to train the model for. An epoch refers to one full cycle through the training dataset. 'auto' decides the optimal number of epochs based on the size of the dataset. If setting the number manually, we support any number between 1 and 50 epochs.
     */
    #[Api('n_epochs', optional: true)]
    public ?int $nEpochs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $nEpochs = null): self
    {
        $obj = new self;

        null !== $nEpochs && $obj->nEpochs = $nEpochs;

        return $obj;
    }

    /**
     * The number of epochs to train the model for. An epoch refers to one full cycle through the training dataset. 'auto' decides the optimal number of epochs based on the size of the dataset. If setting the number manually, we support any number between 1 and 50 epochs.
     */
    public function withNEpochs(int $nEpochs): self
    {
        $obj = clone $this;
        $obj->nEpochs = $nEpochs;

        return $obj;
    }
}
