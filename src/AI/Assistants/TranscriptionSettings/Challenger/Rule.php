<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings\Challenger;

/**
 * How the assistant picks the transcript it uses. The models are compared on how complete and confident their transcripts are, not on language, so the rules work best when both models understand the callers' language.
 *
 * - `best_turn` (default): both models transcribe the whole call. Each turn uses the language booster's transcript only when it scores higher than the transcript of `transcription.model` (clearly higher with non-streaming models). With streaming models, `transcription.model` also decides when each turn ends. Available for every pair.
 * - `best_engine`: both models transcribe the first turns, then the call continues alone on the model whose transcripts scored higher. If neither clearly leads, `transcription.model` continues. Streaming models only.
 * - `merge_words`: both models transcribe each utterance and their words are merged, keeping Arabic and English spoken in the same sentence. Available only for `telnyx/basira` with `cohere/ar-stt`, in either order. The pair runs on the language that applies to `telnyx/basira` (its own, or that of `transcription.model`), which must be Arabic (`ar` or an `ar-` locale), `multi`, or `auto`.
 */
enum Rule: string
{
    case BEST_TURN = 'best_turn';

    case BEST_ENGINE = 'best_engine';

    case MERGE_WORDS = 'merge_words';
}
