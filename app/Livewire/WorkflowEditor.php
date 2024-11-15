<?php

namespace App\Livewire;

use Livewire\Component;

class WorkflowEditor extends Component
{
    public array $elements = array(['id' => 1, 'type' => 'TRIGGER', 'name' => 'Contact created', 'width' => '400px'], ['id' => 2, 'type' => 'ACTION', 'name' => 'Send E-Mail', 'width' => 'auto']);
    public bool $elementSettingsVisible = false;
    public array $currentElementSetting;

    public bool $sidebarVisible = false;
    public array $availableElements = array(
        [
            'slug' => 'contact-custom-filter',
            'name' => 'Contact matches custom filter',
            'type' => 'TRIGGER',
            'svg' => '<svg width="1.5em" height="1.5em" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="35.5" cy="35.5" r="35.5" fill="#ED2A2A"/>
            <path d="M53.5 24.8462C53.3462 24.3846 52.8077 24.3077 52.4231 24.6154L46.1923 30.8462C45.7308 31.3077 44.9615 31.3077 44.5 30.8462L40.1154 26.4615C39.6538 26 39.6538 25.2308 40.1154 24.7692L46.4231 18.5385C46.7308 18.2308 46.5769 17.6923 46.1923 17.4615C45.1154 17.1538 43.9615 17 42.8846 17C36.3461 17 31.1154 22.6154 31.8846 29.3077C32.0385 30.3846 32.2692 31.3077 32.6538 32.2308L18.2692 46.5385C16.5769 48.2308 16.5769 51 18.2692 52.6154C19.1154 53.4615 20.2692 53.9231 21.3462 53.9231C22.4231 53.9231 23.5769 53.4615 24.4231 52.6154L38.7308 38.3077C39.6538 38.6923 40.6538 38.9231 41.6538 39.0769C48.3462 39.8462 53.9615 34.6154 53.9615 28.0769C53.9615 26.9231 53.8077 25.8462 53.5 24.8462Z" fill="white"/>
            </svg>',
        ],
        [
            'slug' => 'contact-created',
            'name' => 'Contact has been created',
            'type' => 'TRIGGER',
            'svg' => '<svg width="1.5em" height="1.5em" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="35.5" cy="35.5" r="35.5" fill="#ED2A2A"/>
            <path d="M22.75 27.2273C22.75 30.7669 19.8958 33.6364 16.375 33.6364C12.8542 33.6364 10 30.7669 10 27.2273C10 23.6876 12.8542 20.8182 16.375 20.8182C19.8958 20.8182 22.75 23.6876 22.75 27.2273Z" fill="white"/>
            <path d="M61 31.5C61 35.0396 58.1458 37.9091 54.625 37.9091C51.1042 37.9091 48.25 35.0396 48.25 31.5C48.25 27.9604 51.1042 25.0909 54.625 25.0909C58.1458 25.0909 61 27.9604 61 31.5Z" fill="white"/>
            <path d="M39.75 29.3636C39.75 31.7234 37.8472 33.6364 35.5 33.6364C33.1528 33.6364 31.25 31.7234 31.25 29.3636C31.25 27.0039 33.1528 25.0909 35.5 25.0909C37.8472 25.0909 39.75 27.0039 39.75 29.3636Z" fill="white"/>
            <path d="M39.75 48.5909C39.75 52.1306 36.8958 55 33.375 55C29.8542 55 27 52.1306 27 48.5909C27 45.0513 29.8542 42.1818 33.375 42.1818C36.8958 42.1818 39.75 45.0513 39.75 48.5909Z" fill="white"/>
            </svg>',
        ],
        [
            'slug' => 'email-opened',
            'name' => 'E-Mail was opened',
            'type' => 'TRIGGER',
            'svg' => '<svg width="1.5em" height="1.5em" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="35.5" cy="35.5" r="35.5" fill="#ED2A2A"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0625 20.6875L13.25 22.5V51.5L15.0625 53.3125H54.9375L56.75 51.5V22.5L54.9375 20.6875H15.0625ZM16.875 26.5975V49.6875H53.125V26.5969L34.9998 43.0745L16.875 26.5975ZM50.2489 24.3125H19.7505L34.9998 38.1755L50.2489 24.3125Z" fill="white"/>
            </svg>',
        ],
        [
            'slug' => 'email-send',
            'name' => 'Send E-Mail',
            'type' => 'ACTION',
            'svg' => '<svg width="1.5em" height="1.5em" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="35.5" cy="35.5" r="35.5" fill="#28BFA4"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0625 20.6875L13.25 22.5V51.5L15.0625 53.3125H54.9375L56.75 51.5V22.5L54.9375 20.6875H15.0625ZM16.875 26.5975V49.6875H53.125V26.5969L34.9998 43.0745L16.875 26.5975ZM50.2489 24.3125H19.7505L34.9998 38.1755L50.2489 24.3125Z" fill="white"/>
            </svg>',
        ],
    );

    public function render()
    {
        return view('livewire.workflow-editor')
            ->layout('layouts.app');
    }

    public function toggleSidebar()
    {
        $this->sidebarVisible = !$this->sidebarVisible;
    }

    public function addElement(string $slug)
    {
        foreach($this->availableElements as $availableElement)
        {
            if($availableElement['slug'] !== $slug) continue;

            $this->elements[] = [
                'id' => count($this->elements),
                'type' => $availableElement['type'],
                'name' => $availableElement['name'],
                'width' => $availableElement['width'] ?? 'auto',
            ];
        }
    }

    public function openActionSettings(int $id)
    {
        foreach($this->elements as $element)
        {
            if( $element['id'] == $id )
            {
                $this->currentElementSetting = $element;
            }
        }
        $this->elementSettingsVisible = true;
    }
}
