<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListParams\Filter;

/**
 * Filter by the given record type.
 */
enum RecordType: string
{
    case AI_VOICE_ASSISTANT = 'ai-voice-assistant';

    case AMD = 'amd';

    case CALL_CONTROL = 'call-control';

    case CONFERENCE = 'conference';

    case CONFERENCE_PARTICIPANT = 'conference-participant';

    case EMBEDDING = 'embedding';

    case FAX = 'fax';

    case INFERENCE = 'inference';

    case INFERENCE_SPEECH_TO_TEXT = 'inference-speech-to-text';

    case MEDIA_STORAGE = 'media_storage';

    case MEDIA_STREAMING = 'media-streaming';

    case MESSAGING = 'messaging';

    case NOISE_SUPPRESSION = 'noise-suppression';

    case RECORDING = 'recording';

    case SIP_TRUNKING = 'sip-trunking';

    case SIPREC_CLIENT = 'siprec-client';

    case STT = 'stt';

    case TTS = 'tts';

    case VERIFY = 'verify';

    case WEBRTC = 'webrtc';

    case WIRELESS = 'wireless';
}
